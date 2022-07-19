<h2 class="text-center">Add new room</h2>
<form method="POST" action="./room.php">
    <div class="mb-3">
        <label for="roomName" class="form-label">Room name</label>
        <input type="text" class="form-control" name="name" placeholder="Room 8" id="roomName" required />
    </div>
    <div class="mb-3">
        <label for="roomFloor" class="form-label">Room floor</label>
        <input type="number" class="form-control" name="floor" placeholder="5" id="roomFloor" required/>
    </div>
    <button type="submit" class="btn btn-primary">Add room</button>
</form>