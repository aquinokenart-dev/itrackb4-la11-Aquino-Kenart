Lab # 11

G1
Route model binding needs two things to be true. Name both, and say what happens when only one of them is.
- Two things must be true: the parameter is type-hinted with my model (Movie $movie), and its name matches the route segment ({movie}). If the name is wrong, I get an empty Movie with no error. If the type-hint is missing, I only get the plain id, so $movie->title crashes.
G2
Your Delete link opened the detail page instead of deleting anything. Explain why.
- A link can only send GET. The show route answers GET at /movies/1, so the browser opened the detail page and nothing was deleted. Only a form with @method('DELETE') can send the DELETE that destroy needs.
G3
old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?
- old('title', $movie->title) shows what I typed first, then the saved value. Without the second argument, the form opens empty. With only the second argument, a rejected edit would erase what I typed and bring back the original values.

