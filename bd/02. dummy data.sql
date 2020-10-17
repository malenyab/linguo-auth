insert into user(fullname, phone_number, address) values ('Herman Abby', '8332840457', '7622 Phyllis Camp Lake Elouiseland, DE 90242-9456');
SELECT LAST_INSERT_ID() INTO @user_id;
insert into user_bankaccount(user_id, account_name, account_number, clabe) values (@user_id, 'Libretón Premium', '19720529', '019820711197205297');
SELECT LAST_INSERT_ID() INTO @user_bank_id;
insert into user_card	(bank_account_id, 	card_name, 		card_digits, 		card_nip, 	card_ccv, expire_month, expire_year) values 
						(@user_bank_id, 	'Principal', 	'370485204891662', 	'1234', 	'567', 		12, 		2024);
