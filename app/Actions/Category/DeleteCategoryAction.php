<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class DeleteCategoryAction
{
    public function __construct(public readonly CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function handle(Category $category): bool
    {

        return DB::transaction(function () use ($category) {
            $category->translations()->delete();
            return $this->categoryRepository->delete($category);
        });
    }
}
