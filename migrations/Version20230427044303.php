<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427044303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE api_log (id INT AUTO_INCREMENT NOT NULL, resource VARCHAR(255) NOT NULL, endpoint LONGTEXT NOT NULL, request_type LONGTEXT DEFAULT NULL, request LONGTEXT DEFAULT NULL, request_length INT NOT NULL, response LONGTEXT DEFAULT NULL, response_code INT NOT NULL, response_length INT NOT NULL, response_id LONGTEXT DEFAULT NULL, duration INT NOT NULL, error_message LONGTEXT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charge (id INT AUTO_INCREMENT NOT NULL, amount INT NOT NULL, currency VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, recipient_email LONGTEXT DEFAULT NULL, address_line1 LONGTEXT DEFAULT NULL, address_postal_code VARCHAR(255) DEFAULT NULL, refunded TINYINT(1) NOT NULL, notes LONGTEXT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE api_log');
        $this->addSql('DROP TABLE charge');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
