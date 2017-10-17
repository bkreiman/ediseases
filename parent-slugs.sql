/* stored procedure for ediseases.com */
DELIMITER $$
CREATE PROCEDURE rkb_fix_child_item(IN termslug VARCHAR(150))
BEGIN

SELECT `term_id` INTO @tid FROM `wpyo_terms` WHERE `slug`=termslug;
SELECT count(*) FROM `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt ON t.term_id=tt.term_id WHERE tt.parent=@tid; 

/*
UPDATE `wpyo_term_taxonomy` tt INNER JOIN `wpyo_terms` t ON t.term_id=tt.term_id SET tt.parent=@tid WHERE 
t.slug = CONCAT('types-',termslug) AND tt.parent=0 AND tt.taxonomy = 'category';
UPDATE `wpyo_term_taxonomy` tt INNER JOIN `wpyo_terms` t ON t.term_id=tt.term_id SET tt.parent=@tid WHERE 
t.`slug` = CONCAT('causes-',termslug) AND tt.parent=0 AND tt.taxonomy = 'category';
UPDATE `wpyo_term_taxonomy` tt INNER JOIN `wpyo_terms` t ON t.term_id=tt.term_id SET tt.parent=@tid WHERE 
t.`slug` = CONCAT('symptoms-',termslug) AND tt.parent=0 AND tt.taxonomy = 'category';
UPDATE `wpyo_term_taxonomy` tt INNER JOIN `wpyo_terms` t ON t.term_id=tt.term_id SET tt.parent=@tid WHERE 
t.`slug` = CONCAT('risk-factors-',termslug) AND tt.parent=0 AND tt.taxonomy = 'category';
UPDATE `wpyo_term_taxonomy` tt INNER JOIN `wpyo_terms` t ON t.term_id=tt.term_id SET tt.parent=@tid WHERE 
t.`slug` = CONCAT('treatment-',termslug) AND tt.parent=0 AND tt.taxonomy = 'category';
UPDATE `wpyo_term_taxonomy` tt INNER JOIN `wpyo_terms` t ON t.term_id=tt.term_id SET tt.parent=@tid WHERE 
t.`slug` = CONCAT('medication-',termslug) AND tt.parent=0 AND tt.taxonomy = 'category';
UPDATE `wpyo_term_taxonomy` tt INNER JOIN `wpyo_terms` t ON t.term_id=tt.term_id SET tt.parent=@tid WHERE 
t.`slug` = CONCAT('prevention-',termslug) AND tt.parent=0 AND tt.taxonomy = 'category';
*/
END$$
DELIMITER ;;

CALL rkb_fix_child_item('abscess');
CALL rkb_fix_child_item('acid-reflux');
CALL rkb_fix_child_item('acne');
CALL rkb_fix_child_item('aids');
CALL rkb_fix_child_item('alcoholism');
CALL rkb_fix_child_item('aneurysm');
CALL rkb_fix_child_item('anorexia');
CALL rkb_fix_child_item('anxiety');
CALL rkb_fix_child_item('appendicitis');
CALL rkb_fix_child_item('appendix');
CALL rkb_fix_child_item('arthritis');
CALL rkb_fix_child_item('aspergers');
CALL rkb_fix_child_item('asthma');
CALL rkb_fix_child_item('autism');
CALL rkb_fix_child_item('back-pain');
CALL rkb_fix_child_item('bad-breath');
CALL rkb_fix_child_item('bed-bugs');
CALL rkb_fix_child_item('bipolar');
CALL rkb_fix_child_item('bipolar-disorder');
CALL rkb_fix_child_item('blood-in-stool');
CALL rkb_fix_child_item('blood-pressure');
CALL rkb_fix_child_item('borderline-personality-disorder');
CALL rkb_fix_child_item('breast-cancer');
CALL rkb_fix_child_item('breast-lump');
CALL rkb_fix_child_item('broken-leg');
CALL rkb_fix_child_item('bronchitis');
CALL rkb_fix_child_item('bulimia');
CALL rkb_fix_child_item('burn');
CALL rkb_fix_child_item('burnout');
CALL rkb_fix_child_item('cad');
CALL rkb_fix_child_item('cancer');
CALL rkb_fix_child_item('candida');
CALL rkb_fix_child_item('canker-sore');
CALL rkb_fix_child_item('cardiac-arrest');
CALL rkb_fix_child_item('carpal-tunnel');
CALL rkb_fix_child_item('celiac-disease');
CALL rkb_fix_child_item('cellulitis');
CALL rkb_fix_child_item('cerebral-palsy');
CALL rkb_fix_child_item('cervical-cancer');
CALL rkb_fix_child_item('chicken-pox');
CALL rkb_fix_child_item('chlamydia');
CALL rkb_fix_child_item('cholesterol');
CALL rkb_fix_child_item('cold');
CALL rkb_fix_child_item('cold-sore');
CALL rkb_fix_child_item('cold-sores');
CALL rkb_fix_child_item('colitis');
CALL rkb_fix_child_item('colon-cancer');
CALL rkb_fix_child_item('concussion');
CALL rkb_fix_child_item('conjunctivitis');
CALL rkb_fix_child_item('constipation');
CALL rkb_fix_child_item('copd');
CALL rkb_fix_child_item('cyst');
CALL rkb_fix_child_item('cystic-fibrosis');
CALL rkb_fix_child_item('dementia');
CALL rkb_fix_child_item('depression');
CALL rkb_fix_child_item('diabetes-symptoms');
CALL rkb_fix_child_item('diarrhea');
CALL rkb_fix_child_item('dic');
CALL rkb_fix_child_item('diverticulitis');
CALL rkb_fix_child_item('down-syndrome');
CALL rkb_fix_child_item('dyslexia');
CALL rkb_fix_child_item('dystonia');
CALL rkb_fix_child_item('e-coli');
CALL rkb_fix_child_item('eating-disorders');
CALL rkb_fix_child_item('eczema');
CALL rkb_fix_child_item('emphysema');
CALL rkb_fix_child_item('endometriosis');
CALL rkb_fix_child_item('enema');
CALL rkb_fix_child_item('epilepsy');
CALL rkb_fix_child_item('erectile-dysfunction');
CALL rkb_fix_child_item('falling');
CALL rkb_fix_child_item('fever');
CALL rkb_fix_child_item('fibromyalgia-symptoms');
CALL rkb_fix_child_item('flu');
CALL rkb_fix_child_item('food-poisoning');
CALL rkb_fix_child_item('frostbite');
CALL rkb_fix_child_item('gallstones');
CALL rkb_fix_child_item('genital-herpes');
CALL rkb_fix_child_item('genital-warts');
CALL rkb_fix_child_item('glaucoma');
CALL rkb_fix_child_item('gonorrhea');
CALL rkb_fix_child_item('gout');
CALL rkb_fix_child_item('guillain-barre-syndrome');
CALL rkb_fix_child_item('hair-loss');
CALL rkb_fix_child_item('head-lice-infestation');
CALL rkb_fix_child_item('headache');
CALL rkb_fix_child_item('hearing-loss');
CALL rkb_fix_child_item('heart-attack');
CALL rkb_fix_child_item('heart-diseases');
CALL rkb_fix_child_item('hemophilia');
CALL rkb_fix_child_item('hemorrhoids');
CALL rkb_fix_child_item('hepatitis');
CALL rkb_fix_child_item('hepatitis-b');
CALL rkb_fix_child_item('hepatitis-c');
CALL rkb_fix_child_item('hernia');
CALL rkb_fix_child_item('herpes-symptoms');
CALL rkb_fix_child_item('hiccups');
CALL rkb_fix_child_item('high-blood-pressure');
CALL rkb_fix_child_item('hiv');
CALL rkb_fix_child_item('hiv-symptoms');
CALL rkb_fix_child_item('hives');
CALL rkb_fix_child_item('hpv');
CALL rkb_fix_child_item('hsv');
CALL rkb_fix_child_item('hypertension');
CALL rkb_fix_child_item('hyperthyroidism');
CALL rkb_fix_child_item('hypothyroidism');
CALL rkb_fix_child_item('ibs');
CALL rkb_fix_child_item('impetigo');
CALL rkb_fix_child_item('irritable-bowel-movement');
CALL rkb_fix_child_item('kidney-stones');
CALL rkb_fix_child_item('laryngitis');
CALL rkb_fix_child_item('leprosy');
CALL rkb_fix_child_item('leukaemia');
CALL rkb_fix_child_item('lice');
CALL rkb_fix_child_item('liver-disease');
CALL rkb_fix_child_item('low-back-pain');
CALL rkb_fix_child_item('lung-cancer');
CALL rkb_fix_child_item('lupus');
CALL rkb_fix_child_item('lyme-disease');
CALL rkb_fix_child_item('lymphoma');
CALL rkb_fix_child_item('measles');
CALL rkb_fix_child_item('melanocytic-nevus');
CALL rkb_fix_child_item('melanoma');
CALL rkb_fix_child_item('meningitis');
CALL rkb_fix_child_item('menopause');
CALL rkb_fix_child_item('mesothelioma');
CALL rkb_fix_child_item('migraine');
CALL rkb_fix_child_item('mono');
CALL rkb_fix_child_item('mononucleosis');
CALL rkb_fix_child_item('mrsa');
CALL rkb_fix_child_item('multiple-sclerosis');
CALL rkb_fix_child_item('muscular-dystrophy');
CALL rkb_fix_child_item('narcissistic-personality-disorder');
CALL rkb_fix_child_item('nausea');
CALL rkb_fix_child_item('obesity');
CALL rkb_fix_child_item('ocd');
CALL rkb_fix_child_item('odd');
CALL rkb_fix_child_item('osteoarthritis');
CALL rkb_fix_child_item('osteoporosis');
CALL rkb_fix_child_item('pad');
CALL rkb_fix_child_item('pancreatic-cancer');
CALL rkb_fix_child_item('pancreatitis');
CALL rkb_fix_child_item('panic-attacks');
CALL rkb_fix_child_item('pcos');
CALL rkb_fix_child_item('piles');
CALL rkb_fix_child_item('pink-eye');
CALL rkb_fix_child_item('plantar-fasciitis');
CALL rkb_fix_child_item('pneumonia');
CALL rkb_fix_child_item('pneumonia-symptoms');
CALL rkb_fix_child_item('poison-ivy');
CALL rkb_fix_child_item('polio');
CALL rkb_fix_child_item('post-traumatic-stress-disorder');
CALL rkb_fix_child_item('progeria');
CALL rkb_fix_child_item('prostate-cancer');
CALL rkb_fix_child_item('psoriasis');
CALL rkb_fix_child_item('ptsd');
CALL rkb_fix_child_item('rabies');
CALL rkb_fix_child_item('rash');
CALL rkb_fix_child_item('rds');
CALL rkb_fix_child_item('rheumatoid-arthritis');
CALL rkb_fix_child_item('ringworm');
CALL rkb_fix_child_item('rosacea');
CALL rkb_fix_child_item('salmonella');
CALL rkb_fix_child_item('sars');
CALL rkb_fix_child_item('scabies');
CALL rkb_fix_child_item('scarlet-fever');
CALL rkb_fix_child_item('schizophrenia');
CALL rkb_fix_child_item('sciatica');
CALL rkb_fix_child_item('scoliosis');
CALL rkb_fix_child_item('shingles');
CALL rkb_fix_child_item('skin-cancer');
CALL rkb_fix_child_item('sleep-apnea');
CALL rkb_fix_child_item('sneeze');
CALL rkb_fix_child_item('sore-throat');
CALL rkb_fix_child_item('std');
CALL rkb_fix_child_item('strep-throat');
CALL rkb_fix_child_item('stress');
CALL rkb_fix_child_item('stroke');
CALL rkb_fix_child_item('supraventricular-tachycardia');
CALL rkb_fix_child_item('symptoms-of-swine-flu');
CALL rkb_fix_child_item('syphilis');
CALL rkb_fix_child_item('thrush');
CALL rkb_fix_child_item('tia');
CALL rkb_fix_child_item('tick');
CALL rkb_fix_child_item('tinnitus');
CALL rkb_fix_child_item('tired');
CALL rkb_fix_child_item('tonsillitis');
CALL rkb_fix_child_item('tuberculosis');
CALL rkb_fix_child_item('urinary-tract-infection');
CALL rkb_fix_child_item('vertigo');
CALL rkb_fix_child_item('vitiligo');
CALL rkb_fix_child_item('yeast-infection');

DROP PROCEDURE IF EXISTS rkb_fix_child_item;