DELIMITER $$
CREATE PROCEDURE rkb_update_terms_slug(IN tid INT, IN tname VARCHAR(150), IN tslug VARCHAR(150))
BEGIN
/*
UPDATE `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
ON t.term_id=tt.term_id 
SET t.name=CONCAT(tname,' ',t.name), 
t.slug=CONCAT(tslug, '-', REPLACE(t.slug, CONCAT('-',tslug), '')) 
WHERE tt.parent = tid AND t.slug = CONCAT('types','-',tslug);

UPDATE `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
ON t.term_id=tt.term_id 
SET t.name=CONCAT(tname,' ',t.name), 
t.slug=CONCAT(tslug, '-', REPLACE(t.slug, CONCAT('-',tslug), '')) 
WHERE tt.parent = tid AND t.slug = CONCAT('causes','-',tslug);

UPDATE `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
ON t.term_id=tt.term_id 
SET t.name=CONCAT(tname,' ',t.name), 
t.slug=CONCAT(tslug, '-', REPLACE(t.slug, CONCAT('-',tslug), '')) 
WHERE tt.parent = tid AND t.slug = CONCAT('symptoms','-',tslug);

UPDATE `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
ON t.term_id=tt.term_id 
SET t.name=CONCAT(tname,' ',t.name), 
t.slug=CONCAT(tslug, '-', REPLACE(t.slug, CONCAT('-',tslug), '')) 
WHERE tt.parent = tid AND t.slug = CONCAT('risk-factors','-',tslug);

UPDATE `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
ON t.term_id=tt.term_id 
SET t.name=CONCAT(tname,' ',t.name), 
t.slug=CONCAT(tslug, '-', REPLACE(t.slug, CONCAT('-',tslug), '')) 
WHERE tt.parent = tid AND t.slug = CONCAT('treatment','-',tslug);

UPDATE `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
ON t.term_id=tt.term_id 
SET t.name=CONCAT(tname,' ',t.name), 
t.slug=CONCAT(tslug, '-', REPLACE(t.slug, CONCAT('-',tslug), '')) 
WHERE tt.parent = tid AND t.slug = CONCAT('medications','-',tslug);

UPDATE `wpyo_terms` t INNER JOIN `wpyo_term_taxonomy` tt 
ON t.term_id=tt.term_id 
SET t.name=CONCAT(tname,' ',t.name), 
t.slug=CONCAT(tslug, '-', REPLACE(t.slug, CONCAT('-',tslug), '')) 
WHERE tt.parent = tid AND t.slug = CONCAT('prevention','-',tslug);
*/
END$$
DELIMITER ;

CALL rkb_update_terms_slug(159,"Abscess","abscess");
CALL rkb_update_terms_slug(158,"Acid reflux","acid-reflux");
CALL rkb_update_terms_slug(13,"Acne","acne");
CALL rkb_update_terms_slug(160,"AIDS","aids");
CALL rkb_update_terms_slug(12,"Alcoholism","alcoholism");
CALL rkb_update_terms_slug(162,"Aneurysm","aneurysm");
CALL rkb_update_terms_slug(60,"Anorexia","anorexia");
CALL rkb_update_terms_slug(62,"Anxiety","anxiety");
CALL rkb_update_terms_slug(14,"Appendicitis","appendicitis");
CALL rkb_update_terms_slug(15,"Appendix","appendix");
CALL rkb_update_terms_slug(61,"Arthritis","arthritis");
CALL rkb_update_terms_slug(16,"Aspergers","aspergers");
CALL rkb_update_terms_slug(59,"Asthma","asthma");
CALL rkb_update_terms_slug(17,"Autism","autism");
CALL rkb_update_terms_slug(18,"Back Pain","back-pain");
CALL rkb_update_terms_slug(19,"Bad Breath","bad-breath");
CALL rkb_update_terms_slug(64,"Bed bugs","bed-bugs");
CALL rkb_update_terms_slug(66,"Bipolar","bipolar");
CALL rkb_update_terms_slug(65,"Bipolar disorder","bipolar-disorder");
CALL rkb_update_terms_slug(161,"Blood in Stool","blood-in-stool");
CALL rkb_update_terms_slug(63,"Blood Pressure","blood-pressure");
CALL rkb_update_terms_slug(20,"Borderline Personality Disorder","borderline-personality-disorder");
CALL rkb_update_terms_slug(21,"Breast Cancer","breast-cancer");
CALL rkb_update_terms_slug(22,"Breast lump","breast-lump");
CALL rkb_update_terms_slug(163,"Broken Leg","broken-leg");
CALL rkb_update_terms_slug(68,"Bronchitis","bronchitis");
CALL rkb_update_terms_slug(111,"Bulimia","bulimia");
CALL rkb_update_terms_slug(69,"Burn","burn");
CALL rkb_update_terms_slug(24,"Burnout","burnout");
CALL rkb_update_terms_slug(70,"CAD","cad");
CALL rkb_update_terms_slug(2,"Cancer","cancer");
CALL rkb_update_terms_slug(165,"Candida","candida");
CALL rkb_update_terms_slug(107,"Canker Sore","canker-sore");
CALL rkb_update_terms_slug(25,"Cardiac arrest","cardiac-arrest");
CALL rkb_update_terms_slug(96,"Carpal Tunnel","carpal-tunnel");
CALL rkb_update_terms_slug(67,"CELIAC DISEASE","celiac-disease");
CALL rkb_update_terms_slug(26,"Cellulitis","cellulitis");
CALL rkb_update_terms_slug(27,"CEREBRAL PALSY","cerebral-palsy");
CALL rkb_update_terms_slug(112,"Cervical Cancer","cervical-cancer");
CALL rkb_update_terms_slug(73,"Chicken Pox","chicken-pox");
CALL rkb_update_terms_slug(75,"Chlamydia","chlamydia");
CALL rkb_update_terms_slug(74,"Cholesterol","cholesterol");
CALL rkb_update_terms_slug(72,"Cold","cold");
CALL rkb_update_terms_slug(115,"Cold Sore","cold-sore");
CALL rkb_update_terms_slug(114,"Cold Sores","cold-sores");
CALL rkb_update_terms_slug(113,"Colitis","colitis");
CALL rkb_update_terms_slug(116,"Colon Cancer","colon-cancer");
CALL rkb_update_terms_slug(120,"Concussion","concussion");
CALL rkb_update_terms_slug(119,"Conjunctivitis","conjunctivitis");
CALL rkb_update_terms_slug(28,"Constipation","constipation");
CALL rkb_update_terms_slug(71,"COPD","copd");
CALL rkb_update_terms_slug(6,"Crohn's","crohns");
CALL rkb_update_terms_slug(76,"CYST","cyst");
CALL rkb_update_terms_slug(3,"CYSTIC FIBROSIS","cystic-fibrosis");
CALL rkb_update_terms_slug(23,"Dementia","dementia");
CALL rkb_update_terms_slug(118,"Depression","depression");
CALL rkb_update_terms_slug(9,"Diabetes","diabetes");
CALL rkb_update_terms_slug(29,"DIABETES SYMPTOMS","diabetes-symptoms");
CALL rkb_update_terms_slug(77,"Diarrhea","diarrhea");
CALL rkb_update_terms_slug(30,"DIC","dic");
CALL rkb_update_terms_slug(8,"Disease","disease");
CALL rkb_update_terms_slug(79,"DIVERTICULITIS","diverticulitis");
CALL rkb_update_terms_slug(80,"DOWN SYNDROME","down-syndrome");
CALL rkb_update_terms_slug(31,"Dyslexia","dyslexia");
CALL rkb_update_terms_slug(117,"Dystonia","dystonia");
CALL rkb_update_terms_slug(123,"E.coli","e-coli");
CALL rkb_update_terms_slug(32,"Eating Disorders","eating-disorders");
CALL rkb_update_terms_slug(81,"Eczema","eczema");
CALL rkb_update_terms_slug(122,"Emphysema","emphysema");
CALL rkb_update_terms_slug(78,"ENDOMETRIOSIS","endometriosis");
CALL rkb_update_terms_slug(34,"ENEMA","enema");
CALL rkb_update_terms_slug(35,"Epilepsy","epilepsy");
CALL rkb_update_terms_slug(121,"Erectile Dysfunction","erectile-dysfunction");
CALL rkb_update_terms_slug(164,"Falling","falling");
CALL rkb_update_terms_slug(37,"Fever","fever");
CALL rkb_update_terms_slug(124,"Fibromyalgia Symptoms","fibromyalgia-symptoms");
CALL rkb_update_terms_slug(33,"Flu","flu");
CALL rkb_update_terms_slug(126,"Food Poisoning","food-poisoning");
CALL rkb_update_terms_slug(125,"Frostbite","frostbite");
CALL rkb_update_terms_slug(166,"Gallstones","gallstones");
CALL rkb_update_terms_slug(38,"Genital Herpes","genital-herpes");
CALL rkb_update_terms_slug(84,"Genital warts","genital-warts");
CALL rkb_update_terms_slug(127,"Glaucoma","glaucoma");
CALL rkb_update_terms_slug(83,"GONORRHEA","gonorrhea");
CALL rkb_update_terms_slug(85,"Gout","gout");
CALL rkb_update_terms_slug(169,"Graves’ Disease","graves-disease");
CALL rkb_update_terms_slug(168,"Guillain Barre Syndrome","guillain-barre-syndrome");
CALL rkb_update_terms_slug(128,"Hair loss","hair-loss");
CALL rkb_update_terms_slug(170,"HEAD LICE INFESTATION","head-lice-infestation");
CALL rkb_update_terms_slug(167,"HEADACHE","headache");
CALL rkb_update_terms_slug(132,"Hearing loss","hearing-loss");
CALL rkb_update_terms_slug(5,"Heart","heart");
CALL rkb_update_terms_slug(131,"Heart Attack","heart-attack");
CALL rkb_update_terms_slug(171,"HEART DISEASES","heart-diseases");
CALL rkb_update_terms_slug(172,"HEMOPHILIA","hemophilia");
CALL rkb_update_terms_slug(82,"Hemorrhoids","hemorrhoids");
CALL rkb_update_terms_slug(134,"Hepatitis","hepatitis");
CALL rkb_update_terms_slug(130,"Hepatitis B","hepatitis-b");
CALL rkb_update_terms_slug(129,"Hepatitis C","hepatitis-c");
CALL rkb_update_terms_slug(87,"HERNIA","hernia");
CALL rkb_update_terms_slug(135,"Herpes Symptoms","herpes-symptoms");
CALL rkb_update_terms_slug(136,"Hiccups","hiccups");
CALL rkb_update_terms_slug(86,"High blood pressure","high-blood-pressure");
CALL rkb_update_terms_slug(36,"HIV","hiv");
CALL rkb_update_terms_slug(173,"HIV SYMPTOMS","hiv-symptoms");
CALL rkb_update_terms_slug(7,"Hiv/Aids","hiv-aids");
CALL rkb_update_terms_slug(133,"Hives","hives");
CALL rkb_update_terms_slug(39,"HPV","hpv");
CALL rkb_update_terms_slug(89,"HSV","hsv");
CALL rkb_update_terms_slug(141,"Hypertension","hypertension");
CALL rkb_update_terms_slug(175,"Hyperthyroidism","hyperthyroidism");
CALL rkb_update_terms_slug(41,"Hypothyroidism","hypothyroidism");
CALL rkb_update_terms_slug(88,"IBS","ibs");
CALL rkb_update_terms_slug(139,"Impetigo","impetigo");
CALL rkb_update_terms_slug(10,"Infection","infection");
CALL rkb_update_terms_slug(174,"Irritable Bowel Movement","irritable-bowel-movement");
CALL rkb_update_terms_slug(42,"Kidney Stones","kidney-stones");
CALL rkb_update_terms_slug(176,"Laryngitis","laryngitis");
CALL rkb_update_terms_slug(140,"Leprosy","leprosy");
CALL rkb_update_terms_slug(43,"Leukaemia","leukaemia");
CALL rkb_update_terms_slug(90,"LICE","lice");
CALL rkb_update_terms_slug(138,"Liver disease","liver-disease");
CALL rkb_update_terms_slug(178,"Low Back Pain","low-back-pain");
CALL rkb_update_terms_slug(40,"Lung Cancer","lung-cancer");
CALL rkb_update_terms_slug(91,"LUPUS","lupus");
CALL rkb_update_terms_slug(143,"Lyme Disease","lyme-disease");
CALL rkb_update_terms_slug(137,"Lymphoma","lymphoma");
CALL rkb_update_terms_slug(4,"Mad Cow","mad-cow");
CALL rkb_update_terms_slug(179,"Measles","measles");
CALL rkb_update_terms_slug(92,"Melanocytic Nevus","melanocytic-nevus");
CALL rkb_update_terms_slug(144,"Melanoma","melanoma");
CALL rkb_update_terms_slug(46,"Meningitis","meningitis");
CALL rkb_update_terms_slug(142,"Menopause","menopause");
CALL rkb_update_terms_slug(177,"Mesothelioma","mesothelioma");
CALL rkb_update_terms_slug(182,"Migraine","migraine");
CALL rkb_update_terms_slug(47,"Mono","mono");
CALL rkb_update_terms_slug(148,"Mononucleosis","mononucleosis");
CALL rkb_update_terms_slug(93,"MRSA","mrsa");
CALL rkb_update_terms_slug(94,"Multiple sclerosis","multiple-sclerosis");
CALL rkb_update_terms_slug(181,"Muscular dystrophy","muscular-dystrophy");
CALL rkb_update_terms_slug(180,"Narcissistic Personality Disorder","narcissistic-personality-disorder");
CALL rkb_update_terms_slug(184,"Nausea","nausea");
CALL rkb_update_terms_slug(45,"OBESITY","obesity");
CALL rkb_update_terms_slug(95,"OCD","ocd");
CALL rkb_update_terms_slug(147,"ODD","odd");
CALL rkb_update_terms_slug(183,"Osteoarthritis","osteoarthritis");
CALL rkb_update_terms_slug(185,"Osteoporosis","osteoporosis");
CALL rkb_update_terms_slug(146,"PAD","pad");
CALL rkb_update_terms_slug(188,"Pancreatic Cancer","pancreatic-cancer");
CALL rkb_update_terms_slug(186,"Pancreatitis","pancreatitis");
CALL rkb_update_terms_slug(44,"PANIC ATTACKS","panic-attacks");
CALL rkb_update_terms_slug(187,"PCOS","pcos");
CALL rkb_update_terms_slug(145,"Piles","piles");
CALL rkb_update_terms_slug(49,"PINK EYE","pink-eye");
CALL rkb_update_terms_slug(190,"Plantar Fasciitis","plantar-fasciitis");
CALL rkb_update_terms_slug(100,"Pneumonia","pneumonia");
CALL rkb_update_terms_slug(152,"Pneumonia Symptoms","pneumonia-symptoms");
CALL rkb_update_terms_slug(50,"Poison Ivy","poison-ivy");
CALL rkb_update_terms_slug(150,"Polio","polio");
CALL rkb_update_terms_slug(189,"Post Traumatic Stress Disorder","post-traumatic-stress-disorder");
CALL rkb_update_terms_slug(99,"PROGERIA","progeria");
CALL rkb_update_terms_slug(191,"Prostate Cancer","prostate-cancer");
CALL rkb_update_terms_slug(98,"PSORIASIS","psoriasis");
CALL rkb_update_terms_slug(151,"PTSD","ptsd");
CALL rkb_update_terms_slug(194,"Rabies","rabies");
CALL rkb_update_terms_slug(149,"Rash","rash");
CALL rkb_update_terms_slug(51,"RDS","rds");
CALL rkb_update_terms_slug(48,"Rheumatoid arthritis","rheumatoid-arthritis");
CALL rkb_update_terms_slug(97,"Ringworm","ringworm");
CALL rkb_update_terms_slug(153,"Rosacea","rosacea");
CALL rkb_update_terms_slug(192,"Salmonella","salmonella");
CALL rkb_update_terms_slug(102,"SARS","sars");
CALL rkb_update_terms_slug(101,"Scabies","scabies");
CALL rkb_update_terms_slug(193,"Scarlet fever","scarlet-fever");
CALL rkb_update_terms_slug(53,"Schizophrenia","schizophrenia");
CALL rkb_update_terms_slug(196,"Sciatica","sciatica");
CALL rkb_update_terms_slug(154,"Scoliosis","scoliosis");
CALL rkb_update_terms_slug(54,"Shingles","shingles");
CALL rkb_update_terms_slug(55,"Skin Cancer","skin-cancer");
CALL rkb_update_terms_slug(195,"Sleep Apnea","sleep-apnea");
CALL rkb_update_terms_slug(155,"Sneeze","sneeze");
CALL rkb_update_terms_slug(11,"Sore Throat","sore-throat");
CALL rkb_update_terms_slug(52,"STD","std");
CALL rkb_update_terms_slug(57,"Strep Throat","strep-throat");
CALL rkb_update_terms_slug(105,"Stress","stress");
CALL rkb_update_terms_slug(197,"Stroke","stroke");
CALL rkb_update_terms_slug(104,"Supraventricular Tachycardia","supraventricular-tachycardia");
CALL rkb_update_terms_slug(198,"Symptoms of Swine Flu","symptoms-of-swine-flu");
CALL rkb_update_terms_slug(103,"SYPHILIS","syphilis");
CALL rkb_update_terms_slug(201,"Thrush","thrush");
CALL rkb_update_terms_slug(106,"TIA","tia");
CALL rkb_update_terms_slug(58,"Tick","tick");
CALL rkb_update_terms_slug(157,"Tinnitus","tinnitus");
CALL rkb_update_terms_slug(156,"Tired","tired");
CALL rkb_update_terms_slug(200,"Tonsillitis","tonsillitis");
CALL rkb_update_terms_slug(56,"Tuberculosis","tuberculosis");
CALL rkb_update_terms_slug(199,"Urinary tract infection","urinary-tract-infection");
CALL rkb_update_terms_slug(109,"UTI","uti");
CALL rkb_update_terms_slug(108,"VERTIGO","vertigo");
CALL rkb_update_terms_slug(202,"Vitiligo","vitiligo");
CALL rkb_update_terms_slug(110,"YEAST INFECTION","yeast-infection");

DROP PROCEDURE rkb_update_terms_slug;