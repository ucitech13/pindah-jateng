<?php

namespace App\Models;

use Database\Factories\VideoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    /** @use HasFactory<VideoFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'pnd_video';

    protected $fillable = ['source_link', 'created_by'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public static function youtubeIdFrom(?string $sourceLink): ?string
    {
        if (! $sourceLink) {
            return null;
        }

        $pattern = '/(?:youtube\.com\/(?:watch\?(?:.*&)?v=|embed\/|shorts\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/i';

        if (preg_match($pattern, $sourceLink, $matches) === 1) {
            return $matches[1];
        }

        return null;
    }

    public function youtubeId(): ?string
    {
        return self::youtubeIdFrom($this->source_link);
    }

    public function embedUrl(): ?string
    {
        $id = $this->youtubeId();

        return $id ? 'https://www.youtube.com/embed/'.$id : null;
    }
}
