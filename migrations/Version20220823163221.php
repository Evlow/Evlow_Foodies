<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823163221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favoris_recipes DROP FOREIGN KEY FK_16834BB051E8871B');
        $this->addSql('ALTER TABLE favoris_users DROP FOREIGN KEY FK_C7E6D68851E8871B');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE favoris_recipes');
        $this->addSql('DROP TABLE favoris_users');
        $this->addSql('DROP TABLE recipes_users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE favoris_recipes (favoris_id INT NOT NULL, recipes_id INT NOT NULL, INDEX IDX_16834BB0FDF2B1FA (recipes_id), INDEX IDX_16834BB051E8871B (favoris_id), PRIMARY KEY(favoris_id, recipes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE favoris_users (favoris_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_C7E6D68867B3B43D (users_id), INDEX IDX_C7E6D68851E8871B (favoris_id), PRIMARY KEY(favoris_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE recipes_users (recipes_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_1BB804BC67B3B43D (users_id), INDEX IDX_1BB804BCFDF2B1FA (recipes_id), PRIMARY KEY(recipes_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE favoris_recipes ADD CONSTRAINT FK_16834BB051E8871B FOREIGN KEY (favoris_id) REFERENCES favoris (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris_recipes ADD CONSTRAINT FK_16834BB0FDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris_users ADD CONSTRAINT FK_C7E6D68851E8871B FOREIGN KEY (favoris_id) REFERENCES favoris (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris_users ADD CONSTRAINT FK_C7E6D68867B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_users ADD CONSTRAINT FK_1BB804BC67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_users ADD CONSTRAINT FK_1BB804BCFDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
    }
}
