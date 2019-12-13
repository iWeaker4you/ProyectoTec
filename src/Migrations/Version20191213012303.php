<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191213012303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE acepted_entity (id INT AUTO_INCREMENT NOT NULL, groupid_id INT NOT NULL, userid_id VARCHAR(255) NOT NULL, INDEX IDX_EA03DB3EB3BB53C (groupid_id), INDEX IDX_EA03DB3E58E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acepted_entity ADD CONSTRAINT FK_EA03DB3EB3BB53C FOREIGN KEY (groupid_id) REFERENCES group_entity (id)');
        $this->addSql('ALTER TABLE acepted_entity ADD CONSTRAINT FK_EA03DB3E58E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post_entity CHANGE image_post image_post VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE acepted_entity');
        $this->addSql('ALTER TABLE post_entity CHANGE image_post image_post VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}