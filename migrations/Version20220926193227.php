<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926193227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tb_avis (id INT AUTO_INCREMENT NOT NULL, avs_utl_num_id INT NOT NULL, avs_commentaire LONGTEXT NOT NULL, avs_date DATETIME NOT NULL, INDEX IDX_D4E1A9E1DE9C0CE1 (avs_utl_num_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tb_contact (id INT AUTO_INCREMENT NOT NULL, ctc_nom VARCHAR(255) NOT NULL, ctc_prenom VARCHAR(255) NOT NULL, ctc_email VARCHAR(255) NOT NULL, ctc_message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tb_droit (id INT AUTO_INCREMENT NOT NULL, drt_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tb_presentation (id INT AUTO_INCREMENT NOT NULL, pst_id INT NOT NULL, pst_adresse VARCHAR(255) NOT NULL, pst_image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tb_prestations (id INT AUTO_INCREMENT NOT NULL, prs_id INT NOT NULL, prs_image VARCHAR(255) NOT NULL, prs_prix DOUBLE PRECISION NOT NULL, prs_duree TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tb_utilisateurs (id INT AUTO_INCREMENT NOT NULL, utl_drt_id_id INT NOT NULL, utl_identifiant VARCHAR(255) NOT NULL, utl_mdp VARCHAR(255) NOT NULL, utl_email VARCHAR(255) NOT NULL, INDEX IDX_2A14E2D92E518BB1 (utl_drt_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tb_avis ADD CONSTRAINT FK_D4E1A9E1DE9C0CE1 FOREIGN KEY (avs_utl_num_id) REFERENCES tb_utilisateurs (id)');
        $this->addSql('ALTER TABLE tb_utilisateurs ADD CONSTRAINT FK_2A14E2D92E518BB1 FOREIGN KEY (utl_drt_id_id) REFERENCES tb_droit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tb_utilisateurs DROP FOREIGN KEY FK_2A14E2D92E518BB1');
        $this->addSql('ALTER TABLE tb_avis DROP FOREIGN KEY FK_D4E1A9E1DE9C0CE1');
        $this->addSql('DROP TABLE tb_avis');
        $this->addSql('DROP TABLE tb_contact');
        $this->addSql('DROP TABLE tb_droit');
        $this->addSql('DROP TABLE tb_presentation');
        $this->addSql('DROP TABLE tb_prestations');
        $this->addSql('DROP TABLE tb_utilisateurs');
    }
}
