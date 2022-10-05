<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221005164244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE contact ADD ctc_numero VARCHAR(13) NOT NULL');
        $this->addSql('ALTER TABLE prestations ADD prs_libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs CHANGE droits utl_drt_id TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE contact DROP ctc_numero');
        $this->addSql('ALTER TABLE prestations DROP prs_libelle');
        $this->addSql('ALTER TABLE utilisateurs CHANGE utl_drt_id droits TINYINT(1) NOT NULL');
    }
}