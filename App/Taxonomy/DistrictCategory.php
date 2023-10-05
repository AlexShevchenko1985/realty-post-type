<?php

namespace App\Taxonomy;

use App\Base\AbstractTaxonomy;

final class DistrictCategory extends AbstractTaxonomy
{
    public function getSlug(): string
    {
        return 'district-category';
    }

    public function getSingular(): string
    {
        return 'District category';
    }

    public function getPlural(): string
    {
        return 'District categories';
    }

    public function getMenuName(): string
    {
        return 'District category';
    }

    public function isHierarchical(): bool
    {
        return true;
    }

    public function getPostTypes(): array
    {
        return [
            'realty'
        ];
    }

    public function getRewriteSlug(): string
    {
        return 'district-category';
    }
}
