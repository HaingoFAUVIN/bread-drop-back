<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505134829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bakery_product (bakery_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_7BB2D9765570DBC4 (bakery_id), INDEX IDX_7BB2D9764584665A (product_id), PRIMARY KEY(bakery_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bakery_product ADD CONSTRAINT FK_7BB2D9765570DBC4 FOREIGN KEY (bakery_id) REFERENCES bakery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bakery_product ADD CONSTRAINT FK_7BB2D9764584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bakery_product DROP FOREIGN KEY FK_7BB2D9765570DBC4');
        $this->addSql('ALTER TABLE bakery_product DROP FOREIGN KEY FK_7BB2D9764584665A');
        $this->addSql('DROP TABLE bakery_product');
    }
}
