<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007123015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD prenom VARCHAR(255) DEFAULT NULL, ADD nom VARCHAR(255) DEFAULT NULL, CHANGE avs_utl_num_id avs_utl_num_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE presentation ADD pst_text LONGTEXT NOT NULL, DROP pst_adresse');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP prenom, DROP nom, CHANGE avs_utl_num_id avs_utl_num_id INT NOT NULL');
        $this->addSql('ALTER TABLE presentation ADD pst_adresse VARCHAR(255) NOT NULL, DROP pst_text');
    }
}
