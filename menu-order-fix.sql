DELIMITER $$
CREATE PROCEDURE rkb_set_menu_new_order()
BEGIN

DECLARE nc INT DEFAULT 0;
DECLARE a INT DEFAULT 1;
DECLARE s INT DEFAULT 0;
DECLARE tempid INT(11) DEFAULT 0;

SELECT COUNT(*) INTO nc FROM `wpyo_posts` p 
INNER JOIN `wpyo_postmeta` pm 
ON p.ID=pm.post_id 
WHERE p.post_type='nav_menu_item' 
AND pm.meta_key='_menu_item_menu_item_parent' 
AND pm.meta_value='1';

up_loop: LOOP
	
	SET a=a+1;
	
	SELECT p.ID INTO tempid FROM `wpyo_posts` p 
	INNER JOIN `wpyo_postmeta` pm 
	ON p.ID=pm.post_id 
	WHERE p.post_type='nav_menu_item' 
	AND pm.meta_key='_menu_item_menu_item_parent' 
	AND pm.meta_value='1'
	ORDER BY p.post_title ASC LIMIT s,1;
	
	SET s=s+1;
	
	UPDATE `wpyo_posts` SET menu_order=a WHERE ID=tempid AND post_type='nav_menu_item';
	
	IF a >= nc THEN
		LEAVE up_loop;
	ELSE
		ITERATE up_loop;
	END IF;
	
END LOOP;

END$$

DELIMITER ;

CALL rkb_set_menu_new_order();
DROP PROCEDURE rkb_set_menu_new_order;
