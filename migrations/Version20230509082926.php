<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230509082926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bakery DROP FOREIGN KEY FK_C647FA2AA40BC2D5');
        $this->addSql('DROP INDEX IDX_C647FA2AA40BC2D5 ON bakery');
        $this->addSql('ALTER TABLE bakery DROP schedule_id');
        $this->addSql('ALTER TABLE schedule ADD bakery_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB5570DBC4 FOREIGN KEY (bakery_id) REFERENCES bakery (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB5570DBC4 ON schedule (bakery_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB5570DBC4');
        $this->addSql('DROP INDEX IDX_5A3811FB5570DBC4 ON schedule');
        $this->addSql('ALTER TABLE schedule DROP bakery_id');
        $this->addSql('ALTER TABLE bakery ADD schedule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bakery ADD CONSTRAINT FK_C647FA2AA40BC2D5 FOREIGN KEY (schedule_id) REFERENCES schedule (id)');
        $this->addSql('CREATE INDEX IDX_C647FA2AA40BC2D5 ON bakery (schedule_id)');
    }
}
