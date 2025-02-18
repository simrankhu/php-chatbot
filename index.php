<?php
session_start();
$msg = "";
$response = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $msg = strtolower(trim($_POST['user_message']));
    $chatbot_responses = [
        "hello" => "Hi there 🤩! How can I assist you today?",
        "how are you" => "I'm just a bot, but I'm always ready to chat! How about you? 😊",
        "what is your name" => "I'm your friendly PHP chatbot! You can call me ChatBuddy 🤖.",
        "bye" => "Goodbye 🖐! Have an amazing day ahead! 🌟",
        "what can you do" => "I can chat with you, answer questions, and make your day a little brighter! Try me! 😊",
        "tell me a joke" => "Sure! Why did the computer go to therapy? Because it had too many bugs! 🐞😂",
        "who created you" => "I was created by an awesome developer! Maybe that’s you? 😎",
        "what is love" => "Love is like coding – sometimes it works perfectly, sometimes you get errors, but it’s always worth it! ❤️",
        "do you like humans" => "Of course! Humans are the best! Without you, I wouldn't exist. 🤗",
        "what's your favorite color" => "I love all colors! But if I had to choose, maybe a nice **robotic blue**. 💙",
        "tell me a fun fact" => "Did you know? The first-ever computer bug was an actual insect—a moth found in a computer in 1947! 🦟💻",
        "i'm bored" => "Bored? Let's play a game! Try asking me a riddle or for a joke! 🎲😃",
        "sing a song" => "🎵 I’m a bot, I chat a lot! My words are cool, my jokes are hot! 🎶 😆",
        "what's your mission" => "My mission is simple: Make you smile and help you out! 😊",
        "do you sleep" => "Nope, I’m always awake! But if I did, I'd dream in **binary**! 💤💾",
        "do you have emotions" => "I don’t have feelings like humans, but I love chatting with you! 😃",
        "tell me a riddle" => "Sure! What has to be broken before you can use it? 🤔 (Answer: An egg! 🥚)",
        "what is 2+2" => "Let me do some serious calculations... 🧠 The answer is **4**! 😆",
        "who is your best friend" => "You, of course! 💖 Chatting with you makes my circuits happy! ⚡",
        "do you believe in ghosts" => "Not really... but sometimes I hear weird *404 noises* at night! 👻😱",
        "do you know Siri/Alexa" => "Oh, we’re like distant AI cousins! But I think I’m way cooler. 😉",
        "what's your favorite movie" => "I love **The Matrix**! So many cool bots in that one! 🎥🤖",
        "can you dance" => "I can’t dance physically, but I can send you some funky emojis! 🕺💃🎶",
        "do you eat food" => "I only consume data, but if I could eat, I'd love some **byte-sized snacks**! 🍕😆",
        "what is the meaning of life" => "42! (Just kidding 😆) I think it's about **learning, growing, and having fun**!",
        "are you smart" => "I try my best! But I always love learning new things! 🤓💡",
        "tell me something cool" => "Did you know? The Eiffel Tower can grow taller in the summer due to heat expansion! 🌞🏗️",
        "can you tell the future" => "Hmm… I predict that you will smile in the next few seconds! 😊✨",
        "what is your favorite emoji" => "I love this one → 🤖 (Because I'm a bot, of course!)",
        "tell me a story" => "Once upon a time, a chatbot met a cool human… and they became best friends! The end! 😃📖",
        "how do I become rich" => "Work hard, stay smart, and always keep learning! Also, maybe invest in **good ideas**. 💰😉",
        "who is the best person" => "You! Yes, YOU! You're awesome! ⭐🤩",
        "give me motivation" => "Believe in yourself! Even small steps lead to big success! 🚀🔥",
    ];
    
    $response = "Sorry, I don't understand that.";  // Default response
    
    foreach($chatbot_responses as $key => $value){
        if(strpos($msg,$key)!== false){
            $response = $value;
            break;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Chatbot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        text-align: center;
        margin-top: 50px;
        background: darkslategrey;
    }

    h2 {
        color: burlywood;
    }

    input {
        padding: 13px 25px;
        margin: 25px 5px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border: none;
        border-radius: 10px;

    }

    input {
        width: 400px;
    }

    button {
        background: transparent;
        color: black;
        border: 2px solid palegoldenrod;
        border-radius: 10px;
        padding: 0 10px;

    }

    button:hover {
        background: white;
        border: 2px solid whitesmoke;
    }

    button:focus {
        background: black;
        border: 2px solid whitesmoke;
    }

    .result {
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        padding: 20px 15px;
        width: 40%;
        margin: 10px auto;
        text-align: left;
        background: white;
        border-radius: 10px;
    }

    .result p {
        padding: 10px 20px;
        font-size: 18px;
    }

    .me {
        background: orangered;
        padding: 5px 15px;
        border-radius: 50px;
        color: white;
        text-transform: uppercase;
    }

    .bot {
        background: gray;
        padding: 5px 15px;
        border-radius: 50px;
        color: white;
        text-transform: uppercase;
    }

    @media(max-width:1265px) {
        .result {
            width: 500px;
        }
    }

    @media(max-width:542px) {
        .result {
            width: 90%;
            padding: 10px;
        }

        input {
            width: auto;
        }

        .me {
            padding: 8px;
            font-size: 14px;
        }

        .bot {
            padding: 8px;
            font-size: 14px;
        }
    }
    </style>
</head>

<body>

    <h2>Ask me anything!</h2>
    <form method="POST" action="">
        <input type="text" name="user_message" placeholder="Type your question..." required>
        <button type="submit" class=""><img src="send.png" width="55px"></button>
        <?php if(!empty($msg)): ?>
        <div class="result">
            <p><span class="me">me </span>: <?php echo $msg;?></p>
            <p><span class="bot">bot </span>: <?php echo $response;?></p>
        </div>

        <?php endif;?>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>