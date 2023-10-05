<?php

namespace App\PostType;

use App\Base\AbstractPostType;

final class Realty extends AbstractPostType
{
    public function getSlug(): string
    {
        return 'realty';
    }

    public function getSingular(): string
    {
        return 'Realty';
    }

    public function getPlural(): string
    {
        return 'Realty';
    }

    public function getMenuName(): string
    {
        return 'Realty';
    }

    public function isHierarchical(): bool
    {
        return true;
    }

    public function hasArchive(): bool
    {
        return true;
    }

    public function getRewriteSlug(): string
    {
        return 'realty';
    }
    public function getSupports(): array
    {
        return [
            self::TITLE,
            self::EDITOR,
            self::THUMBNAIL,
            self::EXCERPT,
            self::AUTHOR,
            self::COMMENTS,
        ];
    }

    public function getTaxonomies(): array
    {
        return [
            'district-category'
        ];
    }

    public function isPublic(): bool
    {
        return true;
    }

    public function isPublicQueryable(): bool
    {
        return true;
    }

    public function isExcludedFromSearch(): bool
    {
        return false;
    }

    public function getMenuIcon(): string
    {
        return 'dashicons-building';
    }

    public function isDisableGutenberg(): bool
    {
        return true;
    }
}
