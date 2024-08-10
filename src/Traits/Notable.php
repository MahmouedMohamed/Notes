<?php

namespace Mahmoued\Notes\Traits;

use Mahmoued\Notes\Models\Note;
use Mahmoued\Notes\Exceptions\NoteCannotBeUpdatedException;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Trait Notable
 *
 * @version August 24, 2023, 11:51 AM UTC
 */
trait Notable
{
    /**
     * Get all of the model's notes.
     */
    public function notes(): MorphMany
    {
        return $this->morphMany(Note::class, 'notable');
    }

    /**
     * Create Note 
     * @param string $text
     * @param string $createdBy
     */
    public function createNote(string $text, string $createdBy): Note
    {
        return $this->notes()->create([
            'text' => $text,
            'created_by' => $createdBy
        ]);
    }

    /**
     * Update Existing Note
     * @param Note $note
     * @param string $text
     * @param string $adminUuid
     */
    public function updateNote(Note $note, string $text, string $adminUuid)
    {
        if ($note->created_by != $adminUuid) {
            throw new NoteCannotBeUpdatedException();
        }
        $note->update([
            'text' => $text
        ]);
        return $note;
    }
}
