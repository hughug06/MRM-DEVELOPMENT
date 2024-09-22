<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jitsi Meeting</title>
    <link rel="stylesheet" href="https://meet.jit.si/external_api.css">
</head>
<body>

<div id="jitsi-meet"></div>

<script src="https://meet.jit.si/external_api.js"></script>
<script>
    const domain = 'meet.jit.si';
    const options = {
        roomName: 'YourUniqueRoomName', // Change this to a unique room name
        width: '100%',
        height: '600px',
        parentNode: document.querySelector('#jitsi-meet'),
        interfaceConfigOverwrite: {
            DISABLE_JOIN_LEAVE_NOTIFICATIONS: true,
            // Optionally hide the "Invite" button or other controls
        },
        configOverwrite: {
            startWithVideoMuted: true,
            startWithAudioMuted: true,
            prejoinPageEnabled: false, // Disable the pre-join page
            enableUserRoles: true, // Enable user roles
            // Ensure only the admin has moderator rights
            roles: {
                moderator: true,
                participant: false
            }
        }
    };

    const api = new JitsiMeetExternalAPI(domain, options);

    // Automatically promote the admin to a moderator
    api.addEventListener('participantJoined', (participant) => {
        if (participant.id === 'adminUserId') { // Replace with your admin user ID or email
            api.executeCommand('setModerator', participant.id);
        }
    });
</script>

</body>
</html>
