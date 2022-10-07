<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007124402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD avs_prenom VARCHAR(255) DEFAULT NULL, ADD avs_nom VARCHAR(255) DEFAULT NULL, CHANGE avs_utl_num_id avs_utl_num_id INT DEFAULT NULL, CHANGE avs_date avs_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE presentation CHANGE pst_adresse pst_text VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP avs_prenom, DROP avs_nom, CHANGE avs_utl_num_id avs_utl_num_id INT NOT NULL, CHANGE avs_date avs_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE presentation CHANGE pst_text pst_adresse VARCHAR(255) NOT NULL');
    }
}
