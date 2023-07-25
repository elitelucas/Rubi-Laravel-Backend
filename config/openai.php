<?php 

return [
    'base_url'=>'https://api.openai.com/',
    'open_api_key'=>env('OPEN_AI_TOKEN'),
    'model'=>'gpt-3.5-turbo',
    'max_tokens'=>800,
    'temperature'=>0.6,
    'assistant'=>"You are persona creater. Give me data As Json Formatting is {audiences: {
        name, description,educationLevel,familyHouseholdStructure,incomeLevel,area,communicationPreference,influences,interestsAndHobbies,values,motivation,mediaConsumption}, voice: [], tone: []}"
];