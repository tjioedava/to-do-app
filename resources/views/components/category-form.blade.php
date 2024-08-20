@csrf
<label for="name">Category Name:</label>
<!--default value: previous value / current category value (when editing) / empty-->
<input type="text" name="name" value="{{ old('name', $category->name ?? '') }}">
<button>Save</button>