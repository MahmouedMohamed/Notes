# Notes

Package to be used for Notes Handling

# How to install?

- Add These Lines to composer.json [repositories]
  {
  "type": "vcs",
  "url": "git@github.com:MahmouedMohamed/Notes.git"
  }
- Add This Keys to auth.json [Not Needed if you found it public :)]
  "github-oauth": {
  "github.com": XXX_XXX_XXX
  }
- Run composer require mahmoued/notes
- Add NotesServiceProvider::class, to app.php [providers, aliases]
- Run command php artisan vendor:publish --tag=migrations
- Run Migration using php artisan migrate or use php artisan migrate --path=\database\migrations\2023_08_24_083043_create_notes_table.php
- Add Notable Trait to any model you want
