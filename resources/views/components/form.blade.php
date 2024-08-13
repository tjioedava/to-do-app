@csrf

<label for="description">Task Description:</label>
<input type="text" name="description" value="{{ old('description', $task->description ?? '') }}">

<label for="date">Date</label>
<input type="date" name="date" value="{{ old('date', $task->date ?? '') }}">

<button>Save</button>