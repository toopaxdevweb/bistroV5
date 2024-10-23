<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241023092901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tag_recette (tag_id INT NOT NULL, recette_id INT NOT NULL, INDEX IDX_7B8A4E3ABAD26311 (tag_id), INDEX IDX_7B8A4E3A89312FE9 (recette_id), PRIMARY KEY(tag_id, recette_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tag_recette ADD CONSTRAINT FK_7B8A4E3ABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_recette ADD CONSTRAINT FK_7B8A4E3A89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD id_user_id INT DEFAULT NULL, ADD recette_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC79F37AE5 ON commentaire (id_user_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC89312FE9 ON commentaire (recette_id)');
        $this->addSql('ALTER TABLE ingredient ADD unite_de_mesure_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870D1BC2C70 FOREIGN KEY (unite_de_mesure_id) REFERENCES unite_de_mesure (id)');
        $this->addSql('CREATE INDEX IDX_6BAF7870D1BC2C70 ON ingredient (unite_de_mesure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tag_recette DROP FOREIGN KEY FK_7B8A4E3ABAD26311');
        $this->addSql('ALTER TABLE tag_recette DROP FOREIGN KEY FK_7B8A4E3A89312FE9');
        $this->addSql('DROP TABLE tag_recette');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870D1BC2C70');
        $this->addSql('DROP INDEX IDX_6BAF7870D1BC2C70 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP unite_de_mesure_id');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC89312FE9');
        $this->addSql('DROP INDEX IDX_67F068BC79F37AE5 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC89312FE9 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP id_user_id, DROP recette_id');
    }
}
