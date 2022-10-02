<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221001142441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315E2E518BB1');
        $this->addSql('DROP TABLE droits');
        $this->addSql('DROP INDEX IDX_497B315E2E518BB1 ON utilisateurs');
        $this->addSql('ALTER TABLE utilisateurs ADD droits TINYINT(1) NOT NULL, DROP utl_drt_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE droits (id INT AUTO_INCREMENT NOT NULL, drt_libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE utilisateurs ADD utl_drt_id_id INT NOT NULL, DROP droits');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E2E518BB1 FOREIGN KEY (utl_drt_id_id) REFERENCES droits (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_497B315E2E518BB1 ON utilisateurs (utl_drt_id_id)');
    }
}
