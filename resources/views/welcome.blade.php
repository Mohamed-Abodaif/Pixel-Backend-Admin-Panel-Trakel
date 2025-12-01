<html>

<head>
    <title>test</title>
</head>

<script src="https://cdn.ably.io/lib/ably.min-1.js"></script>
<script>
const ably = new Ably.Realtime("{{ env('ABLY_KEY') }}");
const channel = ably.channels.get('test-test');

channel.subscribe('my-event', function(message) {
    console.log('Received message: ', message.data);
});
</script>

</html>