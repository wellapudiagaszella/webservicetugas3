import facebook4j.Comment;
import facebook4j.Facebook;
import facebook4j.FacebookException;
import facebook4j.FacebookFactory;
import facebook4j.PagableList;
import facebook4j.Post;
import facebook4j.Reading;
import facebook4j.ResponseList;
import facebook4j.auth.AccessToken;

public class PostsFromPageExtractor {

/**
 * A simple Facebook4J client which
 * illustrates how to access group feeds / posts / comments.
 * 
 * @param args
 * @throws FacebookException 
 */
public static void main(String[] args) throws FacebookException {

    // Generate facebook instance.
    Facebook facebook = new FacebookFactory().getInstance();
    // Use default values for oauth app id.
    facebook.setOAuthAppId("1951537428461293", "ee3ecb6e0df0636ee9510586dc13a726");
    // Get an access token from: 
    // https://developers.facebook.com/tools/explorer
    // Copy and paste it below.
    String accessTokenString = "EAACEdEose0cBAD7iQrpvlhpLPRjTsZCEYvnJZByYPuZBZBX38nS97tpthZC3zLNA2v9wiCZAfJCmg2wk8PKXEpJ28GoY85a9l70SRuCoWTBCXGlAyLo4HCmY7nqQaZBkkiaLhwq5eCe6qUyiQZC2YtkLj3R0kybQB0xZCoh2H9ZAtdTiff65ixDty4avmOmbdpokwveXqAtg42DwZDZD";
    AccessToken at = new AccessToken(accessTokenString);
    // Set access token.
    facebook.setOAuthAccessToken(at);

    // We're done.
    // Access group feeds.
    // You can get the group ID from:
    // https://developers.facebook.com/tools/explorer

  facebook.postStatusMessage("akhirnya berhasil ... ^_^");
    }
}