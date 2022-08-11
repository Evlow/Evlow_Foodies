<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220811105133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, recipes_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_16DB4F89FDF2B1FA (recipes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipes_users (recipes_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_1BB804BCFDF2B1FA (recipes_id), INDEX IDX_1BB804BC67B3B43D (users_id), PRIMARY KEY(recipes_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89FDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id)');
        $this->addSql('ALTER TABLE recipes_users ADD CONSTRAINT FK_1BB804BCFDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_users ADD CONSTRAINT FK_1BB804BC67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes DROP FOREIGN KEY FK_A369E2B512469DE2');
        $this->addSql('ALTER TABLE recipes ADD preparation_6 VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX fk_a369e2b512469de2 ON recipes');
        $this->addSql('CREATE INDEX IDX_A369E2B512469DE2 ON recipes (category_id)');
        $this->addSql('ALTER TABLE recipes ADD CONSTRAINT FK_A369E2B512469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE recipes_users');
        $this->addSql('ALTER TABLE recipes DROP FOREIGN KEY FK_A369E2B512469DE2');
        $this->addSql('ALTER TABLE recipes DROP preparation_6');
        $this->addSql('DROP INDEX idx_a369e2b512469de2 ON recipes');
        $this->addSql('CREATE INDEX FK_A369E2B512469DE2 ON recipes (category_id)');
        $this->addSql('ALTER TABLE recipes ADD CONSTRAINT FK_A369E2B512469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }
}
