@csrf
<label for="name">Category Name:</label>
<input type="text" name="name" value="{{ old('name', $category->name ?? '') }}">
<button>Save</button>