CREATE TABLE IF NOT EXISTS users (
    user_id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(16) NOT NULL,
    email VARCHAR(80) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    user_hash VARCHAR(32) DEFAULT NULL,
    active TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY key (user_id),
    UNIQUE email_index (email)
    
) ENGINE = INNODB ;