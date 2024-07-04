<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property string|null $thumb_path
 * @property string|null $language
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereThumbPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumb_path',
        'language',
        'type',
    ];

    /**
     * Связь с моделью Project
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
