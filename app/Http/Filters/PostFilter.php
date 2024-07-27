<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const TAG_ID= 'tag_id';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::TAG_ID => [$this, 'tagId'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function tagId(Builder $builder, $value)
    {
        $builder->where('tag_id', 'in', $value);
    }
}
