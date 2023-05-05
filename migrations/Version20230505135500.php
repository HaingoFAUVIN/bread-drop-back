<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505135500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bakery ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bakery ADD CONSTRAINT FK_C647FA2AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C647FA2AA76ED395 ON bakery (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bakery DROP FOREIGN KEY FK_C647FA2AA76ED395');
        $this->addSql('DROP INDEX UNIQ_C647FA2AA76ED395 ON bakery');
        $this->addSql('ALTER TABLE bakery DROP user_id');
    }
}
