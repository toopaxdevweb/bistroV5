<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241023121523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, recette_id INT DEFAULT NULL, commentaire LONGTEXT NOT NULL, note NUMERIC(1, 0) NOT NULL, date DATE NOT NULL, INDEX IDX_67F068BC79F37AE5 (id_user_id), INDEX IDX_67F068BC89312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE difficulte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, recette_id INT DEFAULT NULL, INDEX IDX_8933C43279F37AE5 (id_user_id), INDEX IDX_8933C43289312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, unite_de_mesure_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, thumbnail VARCHAR(255) NOT NULL, INDEX IDX_6BAF7870D1BC2C70 (unite_de_mesure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, difficulte_id INT DEFAULT NULL, budget_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, temps INT NOT NULL, description LONGTEXT NOT NULL, date DATE NOT NULL, INDEX IDX_49BB639079F37AE5 (id_user_id), INDEX IDX_49BB6390E6357589 (difficulte_id), INDEX IDX_49BB639036ABA6B8 (budget_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette_ustensile (recette_id INT NOT NULL, ustensile_id INT NOT NULL, INDEX IDX_613487D589312FE9 (recette_id), INDEX IDX_613487D5B78A4282 (ustensile_id), PRIMARY KEY(recette_id, ustensile_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette_categorie (recette_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_FAABB8FA89312FE9 (recette_id), INDEX IDX_FAABB8FABCF5E72D (categorie_id), PRIMARY KEY(recette_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette_ingredient (recette_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_17C041A989312FE9 (recette_id), INDEX IDX_17C041A9933FE08C (ingredient_id), PRIMARY KEY(recette_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_recette (tag_id INT NOT NULL, recette_id INT NOT NULL, INDEX IDX_7B8A4E3ABAD26311 (tag_id), INDEX IDX_7B8A4E3A89312FE9 (recette_id), PRIMARY KEY(tag_id, recette_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unite_de_mesure (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ustensile (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C43279F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C43289312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870D1BC2C70 FOREIGN KEY (unite_de_mesure_id) REFERENCES unite_de_mesure (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB639079F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390E6357589 FOREIGN KEY (difficulte_id) REFERENCES difficulte (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB639036ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id)');
        $this->addSql('ALTER TABLE recette_ustensile ADD CONSTRAINT FK_613487D589312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recette_ustensile ADD CONSTRAINT FK_613487D5B78A4282 FOREIGN KEY (ustensile_id) REFERENCES ustensile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recette_categorie ADD CONSTRAINT FK_FAABB8FA89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recette_categorie ADD CONSTRAINT FK_FAABB8FABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recette_ingredient ADD CONSTRAINT FK_17C041A989312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recette_ingredient ADD CONSTRAINT FK_17C041A9933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_recette ADD CONSTRAINT FK_7B8A4E3ABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_recette ADD CONSTRAINT FK_7B8A4E3A89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC89312FE9');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C43279F37AE5');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C43289312FE9');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870D1BC2C70');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB639079F37AE5');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390E6357589');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB639036ABA6B8');
        $this->addSql('ALTER TABLE recette_ustensile DROP FOREIGN KEY FK_613487D589312FE9');
        $this->addSql('ALTER TABLE recette_ustensile DROP FOREIGN KEY FK_613487D5B78A4282');
        $this->addSql('ALTER TABLE recette_categorie DROP FOREIGN KEY FK_FAABB8FA89312FE9');
        $this->addSql('ALTER TABLE recette_categorie DROP FOREIGN KEY FK_FAABB8FABCF5E72D');
        $this->addSql('ALTER TABLE recette_ingredient DROP FOREIGN KEY FK_17C041A989312FE9');
        $this->addSql('ALTER TABLE recette_ingredient DROP FOREIGN KEY FK_17C041A9933FE08C');
        $this->addSql('ALTER TABLE tag_recette DROP FOREIGN KEY FK_7B8A4E3ABAD26311');
        $this->addSql('ALTER TABLE tag_recette DROP FOREIGN KEY FK_7B8A4E3A89312FE9');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE difficulte');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE recette_ustensile');
        $this->addSql('DROP TABLE recette_categorie');
        $this->addSql('DROP TABLE recette_ingredient');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_recette');
        $this->addSql('DROP TABLE unite_de_mesure');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE ustensile');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
