<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007134626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0DE9C0CE1');
        $this->addSql('DROP INDEX IDX_8F91ABF0DE9C0CE1 ON avis');
        $this->addSql('ALTER TABLE avis DROP avs_utl_num_id, DROP avs_prenom, DROP avs_nom');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD avs_utl_num_id INT DEFAULT NULL, ADD avs_prenom VARCHAR(255) DEFAULT NULL, ADD avs_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0DE9C0CE1 FOREIGN KEY (avs_utl_num_id) REFERENCES utilisateurs (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8F91ABF0DE9C0CE1 ON avis (avs_utl_num_id)');
    }
}
