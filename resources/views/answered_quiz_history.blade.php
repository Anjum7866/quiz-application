  <title>Quiz History</title>
  @extends('admin.layout.master')
  @section('content')
    <div class="sales-boxes">
        <div class="recent-sales box">
       <div class="title">Answered Quiz History</div>
           
            <div class="sales-details">
                    <table>
                        <thead>
                            <tr>
                                <th>Quiz</th>
                                <th>Score</th>
                                <th>Date Taken</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($QuizResult as $result)
                            <tr>
                                <td>{{ $result->quiz->title }}</td>
                                <td>{{ $result->score }}</td>
                                <td><span class="timestamp">{{ $result->answered_at }}</span></td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>  
        </div>   
    </div>       
    @endsection
    <script>
    // Function to update timestamps to "X mins ago" or "X hours ago" format
    function updateTimestamps() {
        const timestamps = document.querySelectorAll('.timestamp');
        timestamps.forEach((timestamp) => {
            const dateTime = timestamp.textContent;
            const date = new Date(dateTime);
            const now = new Date();
            const diffInMinutes = Math.floor((now - date) / 60000); // Convert milliseconds to minutes

            if (diffInMinutes < 1) {
                timestamp.textContent = 'Just now';
            } else if (diffInMinutes < 60) {
                timestamp.textContent = `${diffInMinutes} mins ago`;
            } else {
                const diffInHours = Math.floor(diffInMinutes / 60);
                timestamp.textContent = `${diffInHours} hour${diffInHours > 1 ? 's' : ''} ago`;
            }
        });
    }

    // Update timestamps initially
    updateTimestamps();

    // Update timestamps every minute
    setInterval(updateTimestamps, 60000); // 60000 milliseconds = 1 minute
</script>

