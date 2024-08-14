@csrf

<label for="description">Task Description:</label>
<input type="text" name="description" value="{{ old('description', $task->description ?? '') }}">

<label for="date">Date</label>
<input type="date" name="date" value="{{ old('date', $task->date ?? '') }}">

<label for="category">Category:</label>
<select name="category">
    <option value="">None</option>
    @if ($categories)
        @foreach ($categories as $category)
            <option value="{{ $category->name }}" 
                {{ old('category', $task->category ?? '') == $category->name ? 'selected' : ''}}>
                {{ $category->name }}
            </option>   
        @endforeach
    @endif
</select>

<button>Save</button>