DELIMITER $$
/* rkb_loop_children procedure by Rakibul Hasan santukhan02@gmail.com */
CREATE PROCEDURE rkb_loop_children(IN id INT, IN nch INT, IN title VARCHAR(150), IN slug VARCHAR(150))
BEGIN

DECLARE a INT DEFAULT 0;
DECLARE cid INT;

ch_loop: LOOP
	
	SET cid = 0;
	
	SELECT t.term_id FROM `wpyo_terms` t 
	INNER JOIN `wpyo_term_taxonomy` tt
	ON t.term_id=tt.term_id 
	WHERE t.slug NOT IN 
	(CONCAT(slug,"-types"),CONCAT(slug,"-causes"),CONCAT(slug,"-symptoms"),CONCAT(slug,"-risk-factors"),CONCAT(slug,"-treatment"),CONCAT(slug,"-medications"),CONCAT(slug,"-prevention")) 
	AND tt.parent=id 
	ORDER BY t.name ASC 
	LIMIT a,1 INTO cid;

	IF cid > 0 THEN
		-- SELECT cid;
		UPDATE `wpyo_terms` t 
		SET t.name=CONCAT(title,' ',name),
		t.slug=CONCAT(slug,'-',t.slug) 
		WHERE t.term_id = cid;
	END IF;
	
	SET a = a + 1;

	IF a >= nch THEN 
		LEAVE ch_loop;
	ELSE
		ITERATE ch_loop;
	END IF;

END LOOP;

END$$

/* rkb_fix_child_cat_relation procedure by Rakibul Hasan santukhan02@gmail.com */
CREATE PROCEDURE rkb_fix_child_cat_relation()
BEGIN

DECLARE nr INT DEFAULT 0;
DECLARE n INT DEFAULT 0;
DECLARE numchilds INT DEFAULT 0;
DECLARE realchilds INT DEFAULT 0;
DECLARE temp_id INT DEFAULT 0;
DECLARE title VARCHAR(150) DEFAULT '';
DECLARE slug VARCHAR(150) DEFAULT '';

SELECT COUNT(*) INTO nr FROM `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
ON t.term_id=tt.term_id WHERE tt.parent=0 AND tt.taxonomy='category';


custom_loop: LOOP
	
	SELECT t.term_id, t.name, t.slug, tt.`count` 
	FROM `wpyo_terms` t 
	INNER JOIN `wpyo_term_taxonomy` tt 
	ON t.term_id=tt.term_id 
	WHERE tt.parent=0 AND tt.taxonomy='category'
	ORDER BY t.name ASC LIMIT n,1 INTO temp_id,title,slug,numchilds;
	
	-- SELECT temp_id, title, slug, numchilds;
	
	IF numchilds < 1 THEN
		
		SELECT COUNT(*) INTO realchilds FROM `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
		ON t.term_id=tt.term_id WHERE tt.parent=temp_id AND tt.taxonomy='category';
		
		UPDATE `wpyo_term_taxonomy` SET `count` = realchilds WHERE term_id=temp_id;
		
		SET numchilds = realchilds;
		
	END IF;
	
	IF numchilds < 9 THEN
		CALL rkb_loop_children(temp_id, numchilds, title, slug);
	END IF;
	
	SET n = n + 1;

	IF n >= nr THEN
		LEAVE custom_loop;
	ELSE
		ITERATE custom_loop;
	END IF;

END LOOP;

END$$
DELIMITER ;

CALL rkb_fix_child_cat_relation();

DROP PROCEDURE IF EXISTS rkb_loop_children;
DROP PROCEDURE IF EXISTS rkb_fix_child_cat_relation;