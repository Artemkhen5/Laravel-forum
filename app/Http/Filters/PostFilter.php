<?php


namespace App\Http\Filters;


use http\Env\Request;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const TAG = 'tag_id';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::TAG => [$this, 'tagId'],
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
        $value = [$value];
        $builder->join('post_tag', 'posts.id', '=', 'post_tag.post_id')->whereIn('tag_id', $value);
    }
}
