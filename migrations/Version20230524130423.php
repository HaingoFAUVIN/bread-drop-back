<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524130423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bakery CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495570DBC4');
        $this->addSql('DROP INDEX UNIQ_8D93D6495570DBC4 ON user');
        $this->addSql('ALTER TABLE user DROP bakery_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bakery CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD bakery_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495570DBC4 FOREIGN KEY (bakery_id) REFERENCES bakery (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6495570DBC4 ON user (bakery_id)');
    }
}
