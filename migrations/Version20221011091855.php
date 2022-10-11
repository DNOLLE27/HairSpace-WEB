<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221011091855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP avs_prenom, DROP avs_nom');
        $this->addSql('ALTER TABLE presentation CHANGE pst_text pst_text LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD avs_prenom VARCHAR(255) DEFAULT NULL, ADD avs_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE presentation CHANGE pst_text pst_text VARCHAR(255) NOT NULL');
    }
}
