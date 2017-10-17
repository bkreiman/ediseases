DELIMITER $$
SET @a = 0;
CREATE PROCEDURE test_rakib()
BEGIN
SET @x = 10;
SET @y = 5;
SELECT @x+@y as summation, @x-@y as diff_result;

SET @a = @a + 1; -- increment by 1 
SELECT @a; 
END$$
DELIMITER ;;
CALL test_rakib();
CALL test_rakib();
CALL test_rakib();
DROP PROCEDURE IF EXISTS test_rakib;