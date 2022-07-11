<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220711154609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A727ACA70');
        $this->addSql('DROP TABLE comments');
        $this->addSql('ALTER TABLE recipes ADD ingredient_1 VARCHAR(255) NOT NULL, ADD ingredient_2 VARCHAR(255) NOT NULL, ADD ingredient_3 VARCHAR(255) DEFAULT NULL, ADD ingredient_5 VARCHAR(255) DEFAULT NULL, ADD ingredient_4 VARCHAR(255) DEFAULT NULL, ADD ingredient_6 VARCHAR(255) DEFAULT NULL, ADD ingredient_7 VARCHAR(255) DEFAULT NULL, ADD ingredient_8 VARCHAR(255) DEFAULT NULL, ADD ingredient_9 VARCHAR(255) DEFAULT NULL, ADD ingredient_10 VARCHAR(255) DEFAULT NULL, ADD ingredient_11 VARCHAR(255) DEFAULT NULL, ADD ingredient_12 VARCHAR(255) DEFAULT NULL, ADD ingredient_13 VARCHAR(255) DEFAULT NULL, ADD ingredient_14 VARCHAR(255) DEFAULT NULL, ADD ingredient_15 VARCHAR(255) DEFAULT NULL, ADD preparation_1 VARCHAR(255) NOT NULL, ADD preparation_2 VARCHAR(255) NOT NULL, ADD preparation_3 VARCHAR(255) DEFAULT NULL, ADD preparation_4 VARCHAR(255) DEFAULT NULL, ADD preparation_5 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, recipes_id INT NOT NULL, parent_id INT DEFAULT NULL, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, pseudo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', rgpd TINYINT(1) NOT NULL, INDEX IDX_5F9E962AFDF2B1FA (recipes_id), INDEX IDX_5F9E962A727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AFDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A727ACA70 FOREIGN KEY (parent_id) REFERENCES comments (id)');
        $this->addSql('ALTER TABLE recipes DROP ingredient_1, DROP ingredient_2, DROP ingredient_3, DROP ingredient_5, DROP ingredient_4, DROP ingredient_6, DROP ingredient_7, DROP ingredient_8, DROP ingredient_9, DROP ingredient_10, DROP ingredient_11, DROP ingredient_12, DROP ingredient_13, DROP ingredient_14, DROP ingredient_15, DROP preparation_1, DROP preparation_2, DROP preparation_3, DROP preparation_4, DROP preparation_5');
    }
}
