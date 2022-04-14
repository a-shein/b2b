<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Topic
 *
 * @property-read int $id
 * @property int $customer_id
 * @property string $title
 * @property string $text
 *
 * @property Customer $customer
 * @mixin \Eloquent
 * @method static Topic find($id)
 */
class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'title',
        'text',
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
