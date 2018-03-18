from flask import Flask
from flask import request
from twilio.twiml.messaging_response import MessagingResponse
import datetime

import json
from watson_developer_cloud import NaturalLanguageUnderstandingV1
from watson_developer_cloud.natural_language_understanding_v1 \
  import Features, EntitiesOptions, KeywordsOptions, EmotionOptions


app = Flask(__name__)

@app.route("/")
def hello():
    return "CBT Script" #site url

def body_parse(TEXT_BODY):
	natural_language_understanding = NaturalLanguageUnderstandingV1(
  username='63920a43-4dc6-428e-9314-bcda45a7db8f',
  password='li42ZI432xJn',
  version='2017-02-27')

	percent = natural_language_understanding.analyze(
  text=TEXT_BODY,
  features=Features(
    emotion=EmotionOptions()))

	#print(json.dumps(percent, indent=2))
	return(json.dumps(percent, indent=2))

@app.route("/sms", methods =['GET','POST'])
def thanks_reply():
	resp = MessagingResponse()

	emotional_data = body_parse(request.values['Body'])

	now = datetime.datetime.now()
	date = now.strftime("%Y-%m-%d %H:%M")
	log_name = "log"+date+request.values['From']
	record_responses(log_name,request.values['From'],request.values['Body'], emotional_data)
	
	resp.message("Thanks so much for that log!")
	return str(resp)


# creates a unique local txt file for every log
def record_responses(logname, id, msg, emo_data):
	
	f = open(logname,'w+')
	f.write(+msg+"~\n"+emo_data)
	f.close()
	print('new log documented')

if __name__ == "__main__":
    app.run(debug=True)