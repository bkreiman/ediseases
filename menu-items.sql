DELIMITER $$
SET @a = 1;
CREATE PROCEDURE rkb_update_menu_item_order(IN title VARCHAR(150))
BEGIN
SET @a = @a + 1;
UPDATE `wpyo_posts` SET `menu_order`=@a WHERE `post_title`=title AND `post_type`='nav_menu_item';
END$$
DELIMITER ;;

CALL rkb_update_menu_item_order('Abscess');
CALL rkb_update_menu_item_order('Acid Reflux');
CALL rkb_update_menu_item_order('Acne');
CALL rkb_update_menu_item_order('AIDS');
CALL rkb_update_menu_item_order('Alcoholism');
CALL rkb_update_menu_item_order('Aneurysm');
CALL rkb_update_menu_item_order('Anorexia');
CALL rkb_update_menu_item_order('Anxiety');
CALL rkb_update_menu_item_order('Appendicitis');
CALL rkb_update_menu_item_order('Appendix');
CALL rkb_update_menu_item_order('Arthritis');
CALL rkb_update_menu_item_order('Aspergers');
CALL rkb_update_menu_item_order('Asthma');
CALL rkb_update_menu_item_order('Autism');
CALL rkb_update_menu_item_order('Back Pain');
CALL rkb_update_menu_item_order('Bad Breath');
CALL rkb_update_menu_item_order('Bed Bugs');
CALL rkb_update_menu_item_order('Bipolar');
CALL rkb_update_menu_item_order('Bipolar Disorder');
CALL rkb_update_menu_item_order('Blood In Stool');
CALL rkb_update_menu_item_order('Blood Pressure');
CALL rkb_update_menu_item_order('Borderline Personality Disorder');
CALL rkb_update_menu_item_order('Breast Cancer');
CALL rkb_update_menu_item_order('Breast Lump');
CALL rkb_update_menu_item_order('Broken Leg');
CALL rkb_update_menu_item_order('Bronchitis');
CALL rkb_update_menu_item_order('Bulimia');
CALL rkb_update_menu_item_order('Burn');
CALL rkb_update_menu_item_order('Burnout');
CALL rkb_update_menu_item_order('CAD');
CALL rkb_update_menu_item_order('Cancer');
CALL rkb_update_menu_item_order('Candida');
CALL rkb_update_menu_item_order('Canker Sore');
CALL rkb_update_menu_item_order('Cardiac Arrest');
CALL rkb_update_menu_item_order('Carpal Tunnel');
CALL rkb_update_menu_item_order('CELIAC DISEASE');
CALL rkb_update_menu_item_order('Cellulitis');
CALL rkb_update_menu_item_order('CEREBRAL PALSY');
CALL rkb_update_menu_item_order('Cervical Cancer');
CALL rkb_update_menu_item_order('Chicken Pox');
CALL rkb_update_menu_item_order('Chlamydia');
CALL rkb_update_menu_item_order('Cholesterol');
CALL rkb_update_menu_item_order('Cold');
CALL rkb_update_menu_item_order('Cold Sore');
CALL rkb_update_menu_item_order('Cold Sores');
CALL rkb_update_menu_item_order('Colitis');
CALL rkb_update_menu_item_order('Colon Cancer');
CALL rkb_update_menu_item_order('Concussion');
CALL rkb_update_menu_item_order('Conjunctivitis');
CALL rkb_update_menu_item_order('Constipation');
CALL rkb_update_menu_item_order('COPD');
CALL rkb_update_menu_item_order('CYST');
CALL rkb_update_menu_item_order('CYSTIC FIBROSIS');
CALL rkb_update_menu_item_order('Dementia');
CALL rkb_update_menu_item_order('Depression');
CALL rkb_update_menu_item_order('DIABETES SYMPTOMS');
CALL rkb_update_menu_item_order('Diarrhea');
CALL rkb_update_menu_item_order('DIC');
CALL rkb_update_menu_item_order('DIVERTICULITIS');
CALL rkb_update_menu_item_order('DOWN SYNDROME');
CALL rkb_update_menu_item_order('Dyslexia');
CALL rkb_update_menu_item_order('Dystonia');
CALL rkb_update_menu_item_order('E.coli');
CALL rkb_update_menu_item_order('Eating Disorders');
CALL rkb_update_menu_item_order('Eczema');
CALL rkb_update_menu_item_order('Emphysema');
CALL rkb_update_menu_item_order('ENDOMETRIOSIS');
CALL rkb_update_menu_item_order('ENEMA');
CALL rkb_update_menu_item_order('Epilepsy');
CALL rkb_update_menu_item_order('Erectile Dysfunction');
CALL rkb_update_menu_item_order('Falling');
CALL rkb_update_menu_item_order('Fever');
CALL rkb_update_menu_item_order('Fibromyalgia Symptoms');
CALL rkb_update_menu_item_order('Flu');
CALL rkb_update_menu_item_order('Food Poisoning');
CALL rkb_update_menu_item_order('Frostbite');
CALL rkb_update_menu_item_order('Gallstones');
CALL rkb_update_menu_item_order('Genital Herpes');
CALL rkb_update_menu_item_order('Genital Warts');
CALL rkb_update_menu_item_order('Glaucoma');
CALL rkb_update_menu_item_order('GONORRHEA');
CALL rkb_update_menu_item_order('Gout');
CALL rkb_update_menu_item_order('Graves’ Disease');
CALL rkb_update_menu_item_order('Guillain Barre Syndrome');
CALL rkb_update_menu_item_order('Hair Loss');
CALL rkb_update_menu_item_order('HEAD LICE INFESTATION');
CALL rkb_update_menu_item_order('HEADACHE');
CALL rkb_update_menu_item_order('Hearing Loss');
CALL rkb_update_menu_item_order('Heart Attack');
CALL rkb_update_menu_item_order('HEART DISEASES');
CALL rkb_update_menu_item_order('HEMOPHILIA');
CALL rkb_update_menu_item_order('Hemorrhoids');
CALL rkb_update_menu_item_order('HEMORRHOIDS');
CALL rkb_update_menu_item_order('Hepatitis');
CALL rkb_update_menu_item_order('Hepatitis B');
CALL rkb_update_menu_item_order('Hepatitis C');
CALL rkb_update_menu_item_order('HERNIA');
CALL rkb_update_menu_item_order('Herpes Symptoms');
CALL rkb_update_menu_item_order('Hiccups');
CALL rkb_update_menu_item_order('High Blood Pressure');
CALL rkb_update_menu_item_order('HIV');
CALL rkb_update_menu_item_order('HIV SYMPTOMS');
CALL rkb_update_menu_item_order('Hives');
CALL rkb_update_menu_item_order('HPV');
CALL rkb_update_menu_item_order('HSV');
CALL rkb_update_menu_item_order('Hypertension');
CALL rkb_update_menu_item_order('Hyperthyroidism');
CALL rkb_update_menu_item_order('Hypothyroidism');
CALL rkb_update_menu_item_order('IBS');
CALL rkb_update_menu_item_order('Impetigo');
CALL rkb_update_menu_item_order('Irritable Bowel Movement');
CALL rkb_update_menu_item_order('Kidney Stones');
CALL rkb_update_menu_item_order('Laryngitis');
CALL rkb_update_menu_item_order('Leprosy');
CALL rkb_update_menu_item_order('Leukaemia');
CALL rkb_update_menu_item_order('LICE');
CALL rkb_update_menu_item_order('Liver Disease');
CALL rkb_update_menu_item_order('Low Back Pain');
CALL rkb_update_menu_item_order('Lung Cancer');
CALL rkb_update_menu_item_order('LUPUS');
CALL rkb_update_menu_item_order('Lyme Disease');
CALL rkb_update_menu_item_order('Lymphoma');
CALL rkb_update_menu_item_order('Measles');
CALL rkb_update_menu_item_order('Melanocytic Nevus');
CALL rkb_update_menu_item_order('Melanoma');
CALL rkb_update_menu_item_order('Meningitis');
CALL rkb_update_menu_item_order('Menopause');
CALL rkb_update_menu_item_order('Mesothelioma');
CALL rkb_update_menu_item_order('Migraine');
CALL rkb_update_menu_item_order('Mono');
CALL rkb_update_menu_item_order('Mononucleosis');
CALL rkb_update_menu_item_order('MRSA');
CALL rkb_update_menu_item_order('Multiple Sclerosis');
CALL rkb_update_menu_item_order('Muscular Dystrophy');
CALL rkb_update_menu_item_order('Narcissistic Personality Disorder');
CALL rkb_update_menu_item_order('Nausea');
CALL rkb_update_menu_item_order('OBESITY');
CALL rkb_update_menu_item_order('OCD');
CALL rkb_update_menu_item_order('ODD');
CALL rkb_update_menu_item_order('Osteoarthritis');
CALL rkb_update_menu_item_order('Osteoporosis');
CALL rkb_update_menu_item_order('PAD');
CALL rkb_update_menu_item_order('Pancreatic Cancer');
CALL rkb_update_menu_item_order('Pancreatitis');
CALL rkb_update_menu_item_order('PANIC ATTACKS');
CALL rkb_update_menu_item_order('PCOS');
CALL rkb_update_menu_item_order('Piles');
CALL rkb_update_menu_item_order('PINK EYE');
CALL rkb_update_menu_item_order('Plantar Fasciitis');
CALL rkb_update_menu_item_order('Pneumonia');
CALL rkb_update_menu_item_order('Pneumonia Symptoms');
CALL rkb_update_menu_item_order('Poison Ivy');
CALL rkb_update_menu_item_order('Polio');
CALL rkb_update_menu_item_order('Post Traumatic Stress Disorder');
CALL rkb_update_menu_item_order('PROGERIA');
CALL rkb_update_menu_item_order('Prostate Cancer');
CALL rkb_update_menu_item_order('PSORIASIS');
CALL rkb_update_menu_item_order('PTSD');
CALL rkb_update_menu_item_order('Rabies');
CALL rkb_update_menu_item_order('Rash');
CALL rkb_update_menu_item_order('RDS');
CALL rkb_update_menu_item_order('Rheumatoid Arthritis');
CALL rkb_update_menu_item_order('Ringworm');
CALL rkb_update_menu_item_order('Rosacea');
CALL rkb_update_menu_item_order('Salmonella');
CALL rkb_update_menu_item_order('SARS');
CALL rkb_update_menu_item_order('Scabies');
CALL rkb_update_menu_item_order('Scarlet Fever');
CALL rkb_update_menu_item_order('Schizophrenia');
CALL rkb_update_menu_item_order('Sciatica');
CALL rkb_update_menu_item_order('Scoliosis');
CALL rkb_update_menu_item_order('Shingles');
CALL rkb_update_menu_item_order('Shingles');
CALL rkb_update_menu_item_order('Skin Cancer');
CALL rkb_update_menu_item_order('Sleep Apnea');
CALL rkb_update_menu_item_order('Sneeze');
CALL rkb_update_menu_item_order('Sore Throat');
CALL rkb_update_menu_item_order('STD');
CALL rkb_update_menu_item_order('Strep Throat');
CALL rkb_update_menu_item_order('Stress');
CALL rkb_update_menu_item_order('Stroke');
CALL rkb_update_menu_item_order('Supraventricular Tachycardia');
CALL rkb_update_menu_item_order('Symptoms Of Swine Flu');
CALL rkb_update_menu_item_order('SYPHILIS');
CALL rkb_update_menu_item_order('Thrush');
CALL rkb_update_menu_item_order('TIA');
CALL rkb_update_menu_item_order('Tick');
CALL rkb_update_menu_item_order('Tinnitus');
CALL rkb_update_menu_item_order('Tired');
CALL rkb_update_menu_item_order('Tonsillitis');
CALL rkb_update_menu_item_order('Tuberculosis');
CALL rkb_update_menu_item_order('Urinary Tract Infection');
CALL rkb_update_menu_item_order('VERTIGO');
CALL rkb_update_menu_item_order('Vitiligo');
CALL rkb_update_menu_item_order('YEAST INFECTION');
DROP PROCEDURE IF EXISTS rkb_update_menu_item_order;