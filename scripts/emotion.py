import json
import sys
from watson_developer_cloud import NaturalLanguageUnderstandingV1
from watson_developer_cloud.natural_language_understanding_v1 \
  import Features, EntitiesOptions, KeywordsOptions, EmotionOptions

natural_language_understanding = NaturalLanguageUnderstandingV1(
  username='63920a43-4dc6-428e-9314-bcda45a7db8f',
  password='li42ZI432xJn',
  version='2017-02-27')
#authentication for watson
fileLocation = sys.argv[1] #get the filename that has the journal entry
fileLocation = "../tmp/"+fileLocation #add the directory
textVar = open(fileLocation, 'r').read()
#read the file

response = natural_language_understanding.analyze(
  text=textVar,
  features=Features(
    emotion=EmotionOptions()))
#print the respone
print(json.dumps(response, indent=2))