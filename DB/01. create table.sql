DROP TABLE IF EXISTS user_purchase;
DROP TABLE IF EXISTS user_biometric_credentials;
DROP TABLE IF EXISTS user_card;
DROP TABLE IF EXISTS user_bankaccount;
DROP TABLE IF EXISTS user;

CREATE TABLE user(
	user_id bigint not null auto_increment,
    fullname varchar(300),
    firebase_token varchar(300),
    phone_number varchar(20) not null,
    address text null,
    CONSTRAINT PK_user PRIMARY KEY (user_id)
);

CREATE TABLE user_bankaccount(
	id bigint not null auto_increment,
    user_id bigint not null,
    account_name varchar(100) not null,
    account_number varchar(20) not null,
    clabe varchar(30) not null,
    CONSTRAINT PK_UserBankAccount PRIMARY KEY (id),
    CONSTRAINT FK_UserBankAccount_User FOREIGN KEY (user_id) references user(user_id)
);

CREATE TABLE user_card(
	id bigint not null auto_increment,
    bank_account_id bigint not null,
    card_name varchar(30) not null,
    card_digits varchar(16) not null,
    card_nip varchar(4) not null,
    card_ccv varchar(3) not null,
    expire_month tinyint not null,
    expire_year smallint not null,
    CONSTRAINT PK_UserCard PRIMARY KEY (id),
    CONSTRAINT FK_UserCard_Bankaccount FOREIGN KEY (bank_account_id) REFERENCES user_bankaccount(id)
);

CREATE TABLE user_biometric_credentials(
	user_id bigint not null unique,
    fingerprint text null,
    voice text null,
    CONSTRAINT PK_UserBiometricCredentials PRIMARY KEY (user_id),
    CONSTRAINT FK_UserBiometricCredentials FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE user_purchase(
	purchase_id bigint not null auto_increment,
	user_id bigint not null,
    purchase_date date,
    amount decimal,
    concept varchar(500),
    CONSTRAINT PK_UserPurchase PRIMARY KEY (purchase_id),
    CONSTRAINT FK_UserPurchase_User FOREIGN KEY (user_id) REFERENCES user(user_id)
);