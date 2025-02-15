# embedding-links
Simple idea to use embeddings to redirect users on a webserver based on their embeddings match.

## Basic Function

An `embeddings.csv` created by the admin contains a CSV list in the format of `path-to-follow,embedded-text,embedding`.
This embeddings file is searched by `llm-python-search-file-embeddings.py` when a user submits a query on `index.html`'s simple text box.  (The embedding server needs to be added in both Python scripts.)
`index.php` simply handles calling the Python embeddings search script and returns the result.
`index.html` loads the returned path, redirecting the user to this location.

For example, in the `embeddings.csv.example` file you can see if the embedding query matches `hello` users will be redirected to `/foo/bar/welcome/`.
If they match `goodbye`'s embedding with their query then they will be sent to `/logout.php`.

Currently, the `path-to-follow` needs to be edited after creating the embeddings CSV file.
This CSV file is created using `llm-python-file-embedding-by-line.py` using the command `python3 llm-python-file-embedding-by-line.py file_with_lines_of_text_to_embed.txt > embeddings.csv` to pipe the CSV Embeddings output to the `embeddings.csv` file.  A text editor can then edit the `embeddings.csv` file to update the `path-to-follow` field to the desired location.

## Possible Applications?

 - Music? - Redirect users based on their mood or situation?  `Road Trip` would bring up a playlist designed for driving, etc.
 - Styles? - Instead of redirecting the entire page, maybe a style is selected from a list and applied for the user.
 - General Search? - Navigate the user to the 'About', 'Contact Us', 'Unsubscribe' etc. based on their embedding?
 - Puzzles? - Make the users match a particular embedding to 'win'.  May be hackable, humans are clever, don't use it for anything that needs real security.
