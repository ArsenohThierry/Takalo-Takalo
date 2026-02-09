CREATE DATABASE IF NOT EXISTS takalo;

CREATE USER 'takalo'@'localhost' IDENTIFIED BY 'takalo';
GRANT ALL PRIVILEGES ON takalo.* TO 'takalo'@'localhost';

-- Exit apres se connecter avec cet user :
-- mysql -u takalo -p
--Password : takalo

